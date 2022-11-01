import React, { useEffect, useContext } from 'react';
import { Container, LoadingIcon } from './styles';
import AsyncStorage from '@react-native-community/async-storage';
import { useNavigation } from '@react-navigation/native';


import FaxinaLogo from '../../assets/logo/04.svg';

import UserApi from '../../api/UserApi'


export default () => {

    const navigation = useNavigation();

    useEffect(()=>{
        const checkToken = async () => {
            const token = await AsyncStorage.getItem('token');
            if(token){
                let json = await UserApi.checkToken(token);
                if(json.cpf){
                    navigation.reset({
                        routes:[{name:'MainTab'}]
                    });

                }
                else{
                    navigation.navigate('SignIn');
                }
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