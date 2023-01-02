import React, { useState, useEffect } from 'react';
import { StyleSheet,Text,View } from 'react-native';
import { useNavigation, useRoute } from '@react-navigation/native';
import Swiper from 'react-native-swiper';
import {getEmployeeServicesList, getIsFavorited, getReviews} from '../../api/EmployeeApi';
import {getService, getServiceAdditionals} from '../../api/JobTypeApi';
import {addFavorites, removeFavorites} from '../../api/UserApi';

import Stars from '../../components/Stars';
import EmployeeModal from '../../components/EmployeeModal';

import{
    Container,
    NoPaddingScroller,
    PageBody,
    Header,
    BackButton,
    LoadingIcon,
    CustomArea, 
} from '../../assets/styles/common';

import {  
    UserInfoArea,
    UserAvatar,
    UserInfo,
    UserInfoName,
    UserFavButton,

    ServiceArea,
    ServicesTitle,
    ServiceItem,
    ServiceInfo,
    ServiceName,
    ServicePrice,
    ServiceDescription,
    ServiceChooseButton,
    ServiceChooseBtnText,

    ReviewArea,
    ReviewBody,
    ReviewInfo,
    ReviewItem,
    ReviewName,
    DescriptionArea,
    DescriptionText,
    CategorieArea,
    CategorieItem,
    CategorieText


 } from './styles';

import FavoriteIcon from '../../assets/favorite.svg'
import FavoriteFullIcon from '../../assets/favorite_full.svg'

import BackIcon from '../../assets/back.svg'
import NavPrevIcon from '../../assets/nav_prev.svg'
import NavNextIcon from '../../assets/nav_next.svg'

export default () => {
    const navigation = useNavigation();
    const route = useRoute();

    const [loading, setLoading] = useState(false);
    const [selectedService, setSelectedService] = useState(null);
    const [selectedServiceAdditionals, setSelectedServiceAdditionals] = useState(null);
    const [showModal, setShowModal] = useState(false);
    const [services, setServices] = useState(false);
    const [favorited, setFavorited] = useState(false);
    const [reviews, setReviews] = useState(false);
    
   


    const [userInfo, setUserInfo] = useState({
        id: route.params.id,
        name: route.params.name,
        score: route.params.score,
        avatar: route.params.avatar,
        description: route.params.description,
        categories: route.params.categories,
    });


    useEffect(()=>{
        
        getReviews(setReviews, userInfo.id);
        getEmployeeServicesList(setServices, userInfo.id);    
        getIsFavorited(userInfo.id, setFavorited);

    }, [userInfo]);

    

    const handleBackButton = () => {
        navigation.goBack();
    }

    const handleServiceChoose = (key) => {
        
        getService(setSelectedService, key);
        getServiceAdditionals(setSelectedServiceAdditionals, key);
        
        setShowModal(true);
    }
    const handleFavClick = () => {
        setFavorited( !favorited );
        if(!favorited){
            addFavorites(userInfo.id);
        }
        else{
            removeFavorites(userInfo.id)
        }
    } 
    return (
        <Container>
            <NoPaddingScroller>
            <Header>

            </Header>
                <PageBody>
                    <UserInfoArea>
                        <UserAvatar source={{uri:userInfo.avatar}}/>
                        <UserInfo>
                            <UserInfoName>{userInfo.name}</UserInfoName>
                            <Stars stars={userInfo.score} showNumber={true} />
                        </UserInfo>
                        <UserFavButton onPress={handleFavClick}>
                            {favorited ? 
                                <FavoriteFullIcon width="24" height="24" fill="#FF0000" />:
                                <FavoriteIcon width="24" height="24" fill="#FF0000" />
                            }    
                        </UserFavButton>
                    </UserInfoArea>
                    <DescriptionArea>
                        <UserInfo>
                            <DescriptionText>{userInfo.description}</DescriptionText>
                        </UserInfo>
                    </DescriptionArea>
                    <DescriptionArea>
                        <CategorieArea>
                            {userInfo.categories && userInfo.categories.length > 0 && userInfo.categories.map((item, k)=>(
                                <CategorieItem key={k}>
                                    <CategorieText >
                                        {item}
                                    </CategorieText>
                                </CategorieItem>
                                
                            ))}
                        </CategorieArea>
                    </DescriptionArea>
                    <ReviewArea>
                        <Swiper
                            style={{height: 110}}
                            showsPagination={false}
                            showsButtons={true}
                            prevButton={<NavPrevIcon width="35" height="35" fill="#FFFFFF" />}
                            nextButton={<NavNextIcon width="35" height="35" fill="#FFFFFF" />}
                        >
                            {reviews && reviews.map((item, k)=>(
                                <ReviewItem key={k}>
                                    <ReviewInfo>
                                        <ReviewName>{item.name}</ReviewName>
                                        <Stars stars={item.score} showNumber={false} />
                                    </ReviewInfo>
                                    <ReviewBody>
                                        {item.description}
                                    </ReviewBody>                                
                                </ReviewItem>
                            ))}
                        </Swiper>
                    </ReviewArea>
                    {
                        loading &&
                            <LoadingIcon size="large" color="#000000" />
                    }
                    {services &&
                        <ServiceArea>
                            <ServicesTitle>Lista de Serviços</ServicesTitle>
                            {services.map((item, k)=>(
                                <ServiceItem key={k}>
                                    <ServiceInfo>
                                        <ServiceName>{item.name}</ServiceName>
                                        <ServiceDescription numberOfLines={3}>{item.description}</ServiceDescription>
                                        <ServicePrice>R$ {item.price.toFixed(2)}</ServicePrice>
                                    </ServiceInfo>
                                    <ServiceChooseButton onPress={()=>handleServiceChoose(item.id)}>
                                        <ServiceChooseBtnText>Agendar</ServiceChooseBtnText>
                                    </ServiceChooseButton>
                                </ServiceItem>
                            ))}
                        </ServiceArea>
                    }
                </PageBody>
            </NoPaddingScroller>
            <BackButton onPress={handleBackButton}>
                <BackIcon width="44px" height="44px" fill="#FFFFFF" />
            </BackButton>

            <EmployeeModal
                show={showModal}
                setShow={setShowModal}
                user={userInfo}
                service={selectedService}
                serviceAdditionals = {selectedServiceAdditionals}
            />
        </Container>
    );
}