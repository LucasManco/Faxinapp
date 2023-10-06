import React, { useState, useEffect } from 'react';
import { StyleSheet,Text,View } from 'react-native';
import { useNavigation, useRoute } from '@react-navigation/native';
import Swiper from 'react-native-swiper';
import {getJob} from '../../api/JobApi';
import {getService, getServiceAdditionals} from '../../api/JobTypeApi';
import Stars from '../../components/Stars';
import JobModal from '../../components/JobModal';

import{
    Container,
    NoPaddingScroller,
    PageBody,
    Header,
    BackButton,
    LoadingIcon,
    CustomButton,
    CustomButtonText, 
    CustomText12
} from '../../assets/styles/common';

import {  
    UserInfoArea,
    UserAvatar,
    UserInfo,
    UserInfoName,
    UserInfoEmail,
    UserInfoPhone,
    UserFavButton,
    Divisor,
    Status,
    Start,
    HourText,
    Hour,
    HourContainer,
    JobDetails,
    Observation,
    Address,
    JobTypeArea,
    JobTypeDetails,
    JobtypeName,
    JobtypePrice,
    JobTypeAdditionalsDetails,
    JobTypeAdditionalsItem,
    JobTypeAdditionalsTitle,
    JobTypeAdditionalsName,
    JobTypeAdditionalsPrice,
    PriceDetails,
    PriceArea,
    PriceTitle,
    PriceValue,
    PriceTitleTotal,
    PriceValueTotal,
    CategorieArea,
    CategorieItem,
    CategorieText

 } from './styles';

import FavoriteIcon from '../../assets/favorite.svg'
import BackIcon from '../../assets/back.svg'
import NavPrevIcon from '../../assets/nav_prev.svg'
import NavNextIcon from '../../assets/nav_next.svg'

export default () => {
    const navigation = useNavigation();
    const route = useRoute();
    const [showModal, setShowModal] = useState(false);

    const [loading, setLoading] = useState(false);
    
    const [job, setJob] = useState([]);

    const [jobInfo, setJobInfo] = useState({
        id: route.params.id,
        name: route.params.name,
        email: route.params.email,
        phone: route.params.phone,
        stars: route.params.stars,
        avatar: route.params.avatar,
        status: route.params.status,
        start: route.params.start,
        end: route.params.end
    });

    useEffect(()=>{
        
        getJob(setJob, jobInfo.id);    

    }, [showModal]);

    

    const handleBackButton = () => {
        navigation.goBack();
    }

    const handleServiceChoose = (key) => {
        
        getService(setSelectedService, key);
        getServiceAdditionals(setSelectedServiceAdditionals, key);
        
        setShowModal(true);
    }

    const handleEndService = () => {
        setShowModal(true);

    }

    return (
        <Container>
            <NoPaddingScroller>
            <Header>
                {/* <UserInfoName>JobPage</UserInfoName> */}

            </Header>
                <PageBody>
                    <UserInfoArea>
                        <UserAvatar source={{uri:jobInfo.avatar}}/>
                        <UserInfo>
                            <UserInfoName>{jobInfo.name}</UserInfoName>
                            <UserInfoEmail>{jobInfo.email}</UserInfoEmail>
                            <UserInfoPhone>{jobInfo.phone}</UserInfoPhone>
                            
                            <CategorieItem>
                                <CategorieText>{jobInfo.status}</CategorieText>
                            </CategorieItem>
                        </UserInfo>
                        
                    </UserInfoArea>
                    {
                        loading &&
                            <LoadingIcon size="large" color="#000000" />
                    }
                    <JobDetails>
                        <HourContainer>
                        <Hour><HourText><CustomText12>Horário Marcado</CustomText12> {jobInfo.start}</HourText></Hour>
                        <Hour><HourText><CustomText12>Previsão de Término</CustomText12> {jobInfo.end}</HourText></Hour>
                        </HourContainer>
                        <Divisor/>
                        {/* <Observation><CustomText12>Observações:</CustomText12> {job.observation}</Observation> */}
                        <Address> {job.address}</Address>

                        <JobTypeArea>
                            <JobTypeDetails>
                                <JobtypeName>{job.job_type && job.job_type.name}</JobtypeName>
                                <JobtypePrice>R$ {job && job.price && job.price.toFixed(2)}</JobtypePrice>
                            </JobTypeDetails>
                            
                            {job.job_additionals && job.job_additionals.lenght == 0 ?
                                <JobTypeAdditionalsDetails/>:
                                <>
                                    <JobTypeAdditionalsDetails>
                                        {/* <JobTypeAdditionalsTitle>Adicionais:</JobTypeAdditionalsTitle> */}
                                        {job.job_additionals && job.job_additionals.map((item,key)=>(
                                                <JobTypeAdditionalsItem key={key}>
                                                    <JobTypeAdditionalsName>{item.name}</JobTypeAdditionalsName>
                                                    <JobTypeAdditionalsPrice>R$ {item && item.price && item.price.toFixed(2)}</JobTypeAdditionalsPrice>
                                                </JobTypeAdditionalsItem>
                                        ))}                                        
                                    </JobTypeAdditionalsDetails>
                                </>
                            }
                        </JobTypeArea>
                        <PriceDetails>
                            <PriceArea>
                                <PriceTitle>Preço</PriceTitle>
                                <PriceValue>R$ {job && job.price && job.price.toFixed(2)}</PriceValue>
                            </PriceArea>
                            {job && job.transport != 0 ? 
                                <PriceArea>
                                    <PriceTitle>Transporte</PriceTitle>
                                    <PriceValue>R$ {job && job.transport && job.transport.toFixed(2)}</PriceValue>
                                </PriceArea>
                                :<></>
                            }
                            {job && job.tax != 0 ? 
                                <PriceArea>
                                    <PriceTitle>Impostos</PriceTitle>
                                    <PriceValue>R$ {job && job.tax && job.tax.toFixed(2)}</PriceValue>
                                </PriceArea>
                                :<></>
                            }
                                                        
                            <PriceArea>
                                <PriceTitleTotal>Total</PriceTitleTotal>
                                <PriceValueTotal>R$ {job && job.final_price && job.final_price.toFixed(2)}</PriceValueTotal>
                            </PriceArea>  
                        </PriceDetails>  
                        {job.status == 'confirmed'?
                        <CustomButton onPress={handleEndService}>
                            <CustomButtonText>Finalizar Serviço</CustomButtonText>
                        </CustomButton>                    
                        :
                        <></>
                        }
                        
                    </JobDetails>
                    
                </PageBody>
            </NoPaddingScroller>
            <BackButton onPress={handleBackButton}>
                <BackIcon width="44px" height="44px" fill="#FFFFFF" />
            </BackButton>
            <JobModal
                show={showModal}
                setShow={setShowModal}
                job= {job}
            />
           
        </Container>
    );
}