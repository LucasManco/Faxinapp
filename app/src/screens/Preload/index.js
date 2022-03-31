import React, { useEffect, useContext } from 'react';
import { Container, LoadingIcon } from './styles';
import AsyncStorage from '@react-native-community/async-storage';
import { useNavigation } from '@react-navigation/native';

import { UserContext } from '../../contexts/UserContext';


import FaxinaLogo from '../../assets/faxina.svg';

export default () => {

    // const { dispatch: userDispatch } = useContext(UserContext);
    const navigation = useNavigation();

    useEffect(()=>{
        const checkToken = async () => {
            const token = await AsyncStorage.getItem('token');
            if(token){
                //validar o token
            }
            else{
                navigation.navigate('SignIn');
            }            
        }
        checkToken();
    }, []);

    return (
        <Container>
            <FaxinaLogo width="100%" height="160" />
            <LoadingIcon size="large" color="#FFFFFF" />
        </Container>
    );
}