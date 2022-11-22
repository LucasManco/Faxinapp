import React, { useState, useEffect } from 'react';
import { Platform, RefreshControl } from 'react-native';
import { useNavigation, useIsFocused } from '@react-navigation/native';
import { request, PERMISSIONS } from 'react-native-permissions';
import Geolocation from '@react-native-community/geolocation';

import {getAddresses} from '../../../../api/UserApi'


import {
    Container,
    BackButton,
    NoPaddingScroller,
    Header,
    
    LoadingIcon,
    ListArea,
    PageBody,
    CustomButton,
    CustomButtonText
    
} from '../../../../assets/styles/common';

import {
    AddressTitle
}from './styles';

import AddressItem from '../../../../components/AddressItem';
import BackIcon from '../../../../assets/back.svg';


export default () => {
    const navigation = useNavigation();

    const [addresses, setAddresses] = useState([]);
    
    const [loading, setLoading] = useState(false);
    const [refreshing, setRefreshing] = useState(false);
    const [currentDefaultAddress, setCurrentDefaultAddress] = useState('');
    const isFocused = useIsFocused();

    

    const getAddressesList = async () => {
        setLoading(true);

        getAddresses(setAddresses);

        setLoading(false);
    }

    useEffect(()=>{
        if(isFocused){
            getAddressesList();
        }        
    }, [isFocused]);

    
    const onRefresh = () => {
        setRefreshing(false);
        getAddressesList();
    }
    
    const handleBackButton = () => {
        navigation.goBack();
    }
    const handleNewAddressButton = () => {
        navigation.navigate(
            'AddressCreate'
        );
    }
    return (
        <Container>
            <BackButton onPress={handleBackButton}>
                <BackIcon width="44px" height="44px" fill="#FFFFFF" />
            </BackButton>

            <NoPaddingScroller refreshControl={
                <RefreshControl refreshing={refreshing} onRefresh={onRefresh} />
            }>
                <Header>
                    
                </Header>
                
                <PageBody>
                    <AddressTitle numberOfLines={2}>Endereço de Entrega</AddressTitle>
                    {loading &&
                        <LoadingIcon size="large" color="#FFFFFF" />
                    }
                    <CustomButton onPress={handleNewAddressButton}>
                        <CustomButtonText>Novo Endereço</CustomButtonText>
                    </CustomButton>
                    
                    <ListArea>
                        {addresses.map((item, k)=>(
                            <AddressItem key={k} data={item} setAddresses={setAddresses}/>
                        ))}
                    </ListArea>
                </PageBody>
            </NoPaddingScroller>
        </Container>
    );
}