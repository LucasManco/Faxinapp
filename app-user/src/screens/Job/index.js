import React, { useState, useEffect } from 'react';
import { StyleSheet,Text,View } from 'react-native';
import { useNavigation, useRoute } from '@react-navigation/native';
import Swiper from 'react-native-swiper';
import {getJob} from '../../api/JobApi';
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

    Status,
    Start,
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
    PriceValue

 } from './styles';

import FavoriteIcon from '../../assets/favorite.svg'
import BackIcon from '../../assets/back.svg'
import NavPrevIcon from '../../assets/nav_prev.svg'
import NavNextIcon from '../../assets/nav_next.svg'

export default () => {
    const navigation = useNavigation();
    const route = useRoute();

    const [loading, setLoading] = useState(false);
    
    const [job, setJob] = useState([]);

    const [jobInfo, setJobInfo] = useState({
        id: route.params.id,
        name: route.params.name,
        stars: route.params.stars,
        avatar: route.params.avatar,
        status: route.params.status,
        start: route.params.start
    });

    useEffect(()=>{
        
        getJob(setJob, jobInfo.id);    

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
                <UserInfoName>JobPage</UserInfoName>

            </Header>
                <PageBody>
                    <UserInfoArea>
                        <UserAvatar source={{uri:jobInfo.avatar}}/>
                        <UserInfo>
                            <UserInfoName>{jobInfo.name}</UserInfoName>
                            <Status>{jobInfo.status}</Status>
                        </UserInfo>
                        <UserFavButton>
                            <FavoriteIcon width="24" height="24" fill="#FF0000" />
                        </UserFavButton>
                    </UserInfoArea>
                    {
                        loading &&
                            <LoadingIcon size="large" color="#000000" />
                    }
                    <JobDetails>
                        <Start>Horário Marcado: {jobInfo.start}</Start>
                        <Start>Horário Marcado: {jobInfo.start}</Start>

                        <Observation>Observações: {job.observation}</Observation>
                        <Address>Endereço: {job.address}</Address>

                        <JobTypeArea>
                            <JobTypeDetails>
                                <JobtypeName>{job.job_type && job.job_type.name}</JobtypeName>
                                <JobtypePrice>{job.job_type && job.job_type.price}</JobtypePrice>
                            </JobTypeDetails>
                            
                            {job.job_additionals && job.job_additionals.lenght == 0 ?
                                <JobTypeAdditionalsDetails/>:
                                <>
                                    <JobTypeAdditionalsDetails>
                                        <JobTypeAdditionalsTitle>Adicionais:</JobTypeAdditionalsTitle>
                                        {job.job_additionals && job.job_additionals.map((item,key)=>(
                                                <JobTypeAdditionalsItem>
                                                    <JobTypeAdditionalsName>{item.name}</JobTypeAdditionalsName>
                                                    <JobTypeAdditionalsPrice>{item.price}</JobTypeAdditionalsPrice>
                                                </JobTypeAdditionalsItem>
                                        ))}                                        
                                    </JobTypeAdditionalsDetails>
                                </>
                            }
                        </JobTypeArea>
                        <PriceDetails>
                            <PriceArea>
                                <PriceTitle>Preço</PriceTitle>
                                <PriceValue>{job.price}</PriceValue>
                            </PriceArea>
                            <PriceArea>
                                <PriceTitle>Transporte</PriceTitle>
                                <PriceValue>{job.transport}</PriceValue>
                            </PriceArea>
                            <PriceArea>
                                <PriceTitle>Impostos</PriceTitle>
                                <PriceValue>{job.tax}</PriceValue>
                            </PriceArea>
                            <PriceArea>
                                <PriceTitle>Total</PriceTitle>
                                <PriceValue>{job.final_price}</PriceValue>
                            </PriceArea>  
                        </PriceDetails>                      
                    </JobDetails>
                    
                </PageBody>
            </NoPaddingScroller>
            <BackButton onPress={handleBackButton}>
                <BackIcon width="44px" height="44px" fill="#FFFFFF" />
            </BackButton>

           
        </Container>
    );
}