import React, { useState , useEffect } from 'react';
import { Text } from 'react-native';
import { Container } from './styles';
import UserApi from '../../../api/UserApi';
import { useNavigation } from '@react-navigation/native';
import AsyncStorage from '@react-native-community/async-storage';


import {
    CustomButton,
    CustomButtonText,
    CustomButtonTextSeccundary,
    CustomText
} from './styles';


export default () => {
    const navigation = useNavigation();
    const [user, setUser] = useState(0);
    
    
    

     useEffect(()=>{
        const checkToken = async () => {
            const token = await AsyncStorage.getItem('token');
            console.log(token);
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
        console.log('logout');
        //auth().signOut();
    }

    const handleAddress = () => {
        navigation.navigate(
            'AddressIndex'
        );
    }

    return (
        <Container>
            <CustomText>{user.name}</CustomText>
            <CustomText>AAAAAAAAAAAAAAAAAAA</CustomText>
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