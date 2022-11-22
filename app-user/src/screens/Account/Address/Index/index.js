import React, { useState, useEffect } from 'react';
import { Platform, RefreshControl } from 'react-native';
import { useNavigation, useIsFocused } from '@react-navigation/native';
import { request, PERMISSIONS } from 'react-native-permissions';
import Geolocation from '@react-native-community/geolocation';

import {getAddresses} from '../../../../api/UserApi'


import {
    Container,
    BackButton,
    Scroller,

    HeaderArea,
    HeaderTitle,
    
    LoadingIcon,
    ListArea
    
} from '../../../../assets/styles/common';

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
    return (
        <Container>
            <BackButton onPress={handleBackButton}>
                <BackIcon width="44px" height="44px" fill="#FFFFFF" />
            </BackButton>

            <Scroller refreshControl={
                <RefreshControl refreshing={refreshing} onRefresh={onRefresh} />
            }>
                
                <HeaderArea>
                    <HeaderTitle numberOfLines={2}>Endereço de Entrega</HeaderTitle>
                </HeaderArea>

                {loading &&
                    <LoadingIcon size="large" color="#FFFFFF" />
                }
                
                <ListArea>
                    {addresses.map((item, k)=>(
                        <AddressItem key={k} data={item} setAddresses={setAddresses}/>
                    ))}
                </ListArea>

            </Scroller>
        </Container>
    );
}