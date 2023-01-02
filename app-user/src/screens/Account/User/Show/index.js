import React, { useState, useEffect } from 'react';
import { Platform, RefreshControl } from 'react-native';
import { useNavigation, useIsFocused } from '@react-navigation/native';
import { request, PERMISSIONS } from 'react-native-permissions';
import Geolocation from '@react-native-community/geolocation';

import {getUser} from '../../../../api/UserApi'


import {
    Container,
    BackButton,
    NoPaddingScroller,
    Header,
    CustomArea,
    CustomTextNoSize,
    CustomTextNormalNoSize,
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

    const [user, setUser] = useState([]);
    
    const [loading, setLoading] = useState(false);
    const [refreshing, setRefreshing] = useState(false);
    const [currentDefaultAddress, setCurrentDefaultAddress] = useState('');
    const isFocused = useIsFocused();

    

    const getUserData = async () => {
        setLoading(true);

        getUser(setUser);

        setLoading(false);
    }

    useEffect(()=>{
        if(isFocused){
            getUserData();
        }        
    }, [isFocused]);

    
    const onRefresh = () => {
        setRefreshing(false);
        getUserData();
    }
    
    const handleBackButton = () => {
        navigation.goBack();
    }
    const handleEditUserButton = () => {
        navigation.navigate(
            'UserEdit'
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
                    <AddressTitle numberOfLines={2}>Dados de Usuario</AddressTitle>
                    {loading &&
                        <LoadingIcon size="large" color="#FFFFFF" />
                    }
                    <CustomArea>
                        <CustomTextNormalNoSize>{user.name}</CustomTextNormalNoSize>                        
                    </CustomArea>
                    <CustomArea>
                        <CustomTextNormalNoSize>{user.email}</CustomTextNormalNoSize>
                    </CustomArea>
                    <CustomArea>
                        <CustomTextNoSize>CPF:</CustomTextNoSize>
                        <CustomTextNormalNoSize>{user.cpf}</CustomTextNormalNoSize>
                    </CustomArea>
                    <CustomArea>
                        <CustomTextNoSize>Telefone:</CustomTextNoSize>
                        <CustomTextNormalNoSize>{user.phone_number}</CustomTextNormalNoSize>
                    </CustomArea>
                    
                    <CustomButton onPress={handleEditUserButton}>
                        <CustomButtonText>Editar Usuario</CustomButtonText>
                    </CustomButton>
                    
                    
                </PageBody>
            </NoPaddingScroller>
        </Container>
    );
}