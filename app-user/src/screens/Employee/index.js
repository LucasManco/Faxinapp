import React, { useState, useEffect } from 'react';
import { StyleSheet,Text,View } from 'react-native';
import { useNavigation, useRoute } from '@react-navigation/native';
import Swiper from 'react-native-swiper';
import Stars from '../../components/Stars'

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


const styles = StyleSheet.create({
    wrapper: {
        height:100
    },
    slide1: {
      flex: 1,
      justifyContent: 'center',
      alignItems: 'center',
      backgroundColor: '#9DD6EB'
    },
    slide2: {
      flex: 1,
      justifyContent: 'center',
      alignItems: 'center',
      backgroundColor: '#97CAE5'
    },
    slide3: {
      flex: 1,
      justifyContent: 'center',
      alignItems: 'center',
      backgroundColor: '#92BBD9'
    },
    text: {
      color: '#fff',
      fontSize: 30,
      fontWeight: 'bold'
    }
  })

export default () => {
    const navigation = useNavigation();
    const route = useRoute();

    const [loading, setLoading] = useState(false);


    const [userInfo, setUserInfo] = useState({
        id: route.params.id,
        name: route.params.name,
        stars: route.params.stars,
        avatar: route.params.avatar,
    });

    const services = [
        {
            nome: "Serviço 1",
            preco: "13.3"
        }
    ]

    const handleBackButton = () => {
        navigation.goBack();
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
                    
                            <ServiceItem>
                                <ServiceInfo>
                                    <ServiceName>Serviço 01</ServiceName>
                                    <ServicePrice>R$ 14,90</ServicePrice>
                                </ServiceInfo>
                                <ServiceChooseButton>
                                    <ServiceChooseBtnText>Agendar</ServiceChooseBtnText>
                                </ServiceChooseButton>
                            </ServiceItem>
                            <ServiceItem>
                                <ServiceInfo>
                                    <ServiceName>Serviço 02</ServiceName>
                                    <ServicePrice>R$ 99,90</ServicePrice>
                                </ServiceInfo>
                                <ServiceChooseButton>
                                    <ServiceChooseBtnText>Agendar</ServiceChooseBtnText>
                                </ServiceChooseButton>
                            </ServiceItem>
                            <ServiceItem>
                                <ServiceInfo>
                                    <ServiceName>Serviço 03</ServiceName>
                                    <ServicePrice>R$ 99,90</ServicePrice>
                                </ServiceInfo>
                                <ServiceChooseButton>
                                    <ServiceChooseBtnText>Agendar</ServiceChooseBtnText>
                                </ServiceChooseButton>
                            </ServiceItem>
                            <ServiceItem>
                                <ServiceInfo>
                                    <ServiceName>Serviço 04</ServiceName>
                                    <ServicePrice>R$ 99,90</ServicePrice>
                                </ServiceInfo>
                                <ServiceChooseButton>
                                    <ServiceChooseBtnText>Agendar</ServiceChooseBtnText>
                                </ServiceChooseButton>
                            </ServiceItem>
                            <ServiceItem>
                                <ServiceInfo>
                                    <ServiceName>Serviço 05</ServiceName>
                                    <ServicePrice>R$ 99,90</ServicePrice>
                                </ServiceInfo>
                                <ServiceChooseButton>
                                    <ServiceChooseBtnText>Agendar</ServiceChooseBtnText>
                                </ServiceChooseButton>
                            </ServiceItem>
                        </ServiceArea>
                    }
                    <TestimonialArea>
                        <Swiper
                            style={{height: 110}}
                            // showsPagination={false}
                            // showsButtons={true}
                            // prevButton={<NavPrevIcon width="35" height="35" fill="#000000" />}
                            // nextButton={<NavNextIcon width="35" height="35" fill="#000000" />}
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
                        <View>
                            <View style={{ height: 100 }} />
                            <Swiper>
                                <View style={{ flex: 1, backgroundColor: 'tomato' }} />
                            </Swiper>
                        </View>
                    </TestimonialArea>
                </PageBody>
            </Scroller>
            <BackButton onPress={handleBackButton}>
                <BackIcon width="44px" height="44px" fill="#FFFFFF" />
            </BackButton>
        </Container>
    );
}