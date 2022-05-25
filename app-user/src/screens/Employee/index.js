import React, { useState, useEffect } from 'react';
import { StyleSheet,Text,View } from 'react-native';
import { useNavigation, useRoute } from '@react-navigation/native';
import Swiper from 'react-native-swiper';
import {getEmployeeServicesList} from '../../api/EmployeeApi'
import Stars from '../../components/Stars'
import EmployeeModal from '../../components/EmployeeModal'

import { 
    Container,
    Scroller,
    Header,
    PageBody,
    UserInfoArea,
    UserAvatar,
    UserInfo,
    UserInfoName,
    UserFavButton,
    BackButton,
    LoadingIcon,
    
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
    const [showModal, setShowModal] = useState(false);


    const [userInfo, setUserInfo] = useState({
        id: route.params.id,
        name: route.params.name,
        stars: route.params.stars,
        avatar: route.params.avatar,
    });

    const services = getEmployeeServicesList(userInfo.id);

    const handleBackButton = () => {
        navigation.goBack();
    }

    const handleServiceChoose = (key) => {
        setSelectedService(key);
        setShowModal(true);
    }

    return (
        <Container>
            <Scroller>
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
                    
                            <ServiceItem key="0">
                                <ServiceInfo>
                                    <ServiceName>Serviço 01</ServiceName>
                                    <ServiceDescription>Quisque commodo dignissim efficitur. In hac habitasse platea </ServiceDescription>
                                    <ServicePrice>R$ 14,90</ServicePrice>
                                </ServiceInfo>
                                <ServiceChooseButton onPress={()=>handleServiceChoose()}>
                                    <ServiceChooseBtnText>Agendar</ServiceChooseBtnText>
                                </ServiceChooseButton>
                            </ServiceItem>
                            <ServiceItem key="1">
                                <ServiceInfo>
                                    <ServiceName>Serviço 02</ServiceName>
                                    <ServiceDescription>Quisque commodo dignissim efficitur. In hac habitasse platea </ServiceDescription>
                                    <ServicePrice>R$ 99,90</ServicePrice>
                                </ServiceInfo>
                                <ServiceChooseButton onPress={()=>handleServiceChoose()}>
                                    <ServiceChooseBtnText>Agendar</ServiceChooseBtnText>
                                </ServiceChooseButton>
                            </ServiceItem>
                            <ServiceItem key="2">
                                <ServiceInfo>
                                    <ServiceName>Serviço 03</ServiceName>
                                    <ServiceDescription>Quisque commodo dignissim efficitur. In hac habitasse platea </ServiceDescription>
                                    <ServicePrice>R$ 99,90</ServicePrice>
                                </ServiceInfo>
                                <ServiceChooseButton onPress={()=>handleServiceChoose()}>
                                    <ServiceChooseBtnText>Agendar</ServiceChooseBtnText>
                                </ServiceChooseButton>
                            </ServiceItem>
                            <ServiceItem key="3">
                                <ServiceInfo>
                                    <ServiceName>Serviço 04</ServiceName>
                                    <ServiceDescription>Quisque commodo dignissim efficitur. In hac habitasse platea </ServiceDescription>
                                    <ServicePrice>R$ 99,90</ServicePrice>
                                </ServiceInfo>
                                <ServiceChooseButton onPress={()=>handleServiceChoose()}>
                                    <ServiceChooseBtnText>Agendar</ServiceChooseBtnText>
                                </ServiceChooseButton>
                            </ServiceItem>
                            <ServiceItem key="4">
                                <ServiceInfo>
                                    <ServiceName>Serviço 05</ServiceName>
                                    <ServiceDescription>Quisque commodo dignissim efficitur. In hac habitasse platea </ServiceDescription>
                                    <ServicePrice>R$ 99,90</ServicePrice>
                                </ServiceInfo>
                                <ServiceChooseButton onPress={()=>handleServiceChoose()}>
                                    <ServiceChooseBtnText>Agendar</ServiceChooseBtnText>
                                </ServiceChooseButton>
                            </ServiceItem>
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
                        </Swiper>
                    </TestimonialArea>
                </PageBody>
            </Scroller>
            <BackButton onPress={handleBackButton}>
                <BackIcon width="44px" height="44px" fill="#FFFFFF" />
            </BackButton>

            <EmployeeModal
                show={showModal}
                setShow={setShowModal}
                user={userInfo}
                service={selectedService}
            />
        </Container>
    );
}