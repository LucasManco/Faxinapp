import React, { useState , useEffect } from 'react';
import { Text } from 'react-native';
import UserApi from '../../../api/UserApi';
import { useNavigation } from '@react-navigation/native';
import AsyncStorage from '@react-native-community/async-storage';


import {
    Container,
    CustomButton,
    CustomButtonText,
    CustomButtonTextSeccundary,
    CustomText
} from '../../../assets/styles/common';


export default () => {
    const navigation = useNavigation();
    const [user, setUser] = useState(0);
    
    
    

     useEffect(()=>{
        const checkToken = async () => {
            const token = await AsyncStorage.getItem('token');
            if(token){
                let json = await UserApi.checkToken(token);
                if(json.cpf){
                    setUser(json);
                }                
            }           
        }
        checkToken();
    }, []);
   
    
        
    


    const handleSignOut = () => {
        UserApi.logout();
        navigation.navigate(
            'Preload'
        );
    }

    const handleAddress = () => {
        navigation.navigate(
            'AddressIndex'
        );
    }

    return (
        <Container>
            <CustomText></CustomText>
            
            <CustomButton onPress={handleAddress}>
                <CustomButtonText>Endereços</CustomButtonText>
                <CustomButtonTextSeccundary>Meus Endereços de Entrega</CustomButtonTextSeccundary>
            </CustomButton>            
            <CustomButton onPress={handleSignOut}>
                <CustomButtonText>Logout</CustomButtonText>
            </CustomButton>            
        </Container>
    );
}