import React, { useState, useEffect } from 'react';
import { StyleSheet,Text,View } from 'react-native';
import { useNavigation, useRoute } from '@react-navigation/native';
import Swiper from 'react-native-swiper';
import {getEmployeeServicesList} from '../../api/EmployeeApi';
import {getService, getServiceAdditionals} from '../../api/JobTypeApi';
import Stars from '../../components/Stars';
import EmployeeModal from '../../components/EmployeeModal';

import{
    Container,
    NoPaddingScroller,
    PageBody,
    Header,
    BackButton,
    LoadingIcon, 
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

    TestimonialArea,
    TestimonialBody,
    TestimonialInfo,
    TestimonialItem,
    TestimonialName
 } from './styles';

import FavoriteIcon from '../../assets/favorite.svg'
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

    const [userInfo, setUserInfo] = useState({
        id: route.params.id,
        name: route.params.name,
        stars: route.params.stars,
        avatar: route.params.avatar,
    });

    useEffect(()=>{
        
        getEmployeeServicesList(setServices, userInfo.id);    

    }, []);

    

    const handleBackButton = () => {
        navigation.goBack();
    }

    const handleServiceChoose = (key) => {
        
        getService(setSelectedService, key);
        getServiceAdditionals(setSelectedServiceAdditionals, key);
        
        setShowModal(true);
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
                            <Stars stars={userInfo.stars} showNumber={true} />
                        </UserInfo>
                        <UserFavButton>
                            <FavoriteIcon width="24" height="24" fill="#FF0000" />
                        </UserFavButton>
                    </UserInfoArea>
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
                    <TestimonialArea>
                        {/* 
                            TODO  -> Swipper bugado
                        */}
                        <Swiper
                            style={{height: 110}}
                            showsPagination={false}
                            showsButtons={true}
                            prevButton={<NavPrevIcon width="35" height="35" fill="#000000" />}
                            nextButton={<NavNextIcon width="35" height="35" fill="#000000" />}
                        >
                            <TestimonialItem key="0">
                                <TestimonialInfo>
                                    <TestimonialName>Fulano da Silva</TestimonialName>
                                    <Stars stars="5" showNumber={false} />
                                </TestimonialInfo>
                                <TestimonialBody>
                                    Aliquam erat volutpat.
                                </TestimonialBody>                                
                            </TestimonialItem>
                            <TestimonialItem key="2">
                                <TestimonialInfo>
                                    <TestimonialName>iobgvopiulbgi da Silva</TestimonialName>
                                    <Stars stars="5" showNumber={false} />
                                </TestimonialInfo>
                                <TestimonialBody>
                                    iogvbpiyugbophbnpç
                                </TestimonialBody>                                
                            </TestimonialItem>
                        </Swiper>
                    </TestimonialArea>
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