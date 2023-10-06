import React, { useState } from 'react';
import { useNavigation } from '@react-navigation/native';
import { AsyncStorage } from 'react-native';
import { registerRootComponent } from 'expo';

import { UserContext } from '../../contexts/UserContext';
import {
    ContainerCenter,
    InputAreaCol,
    CustomButton,
    CustomButtonText
} from '../../assets/styles/common';
import {
    SignMessageButton,
    SignMessageButtonText,
    SignMessageButtonTextBold
} from '../../assets/styles/sign';

import SignInput from '../../components/SignInput';
import FaxinaLogo from '../../assets/logo/04.svg';
import PersonIcon from '../../assets/person.svg';
import EmailIcon from '../../assets/email.svg';
import LockIcon from '../../assets/lock.svg';
import { Alert } from 'react-native';

import UserApi from '../../api/UserApi'

import App from '../../../App'
registerRootComponent(App);

export default () => {
    // const { dispatch: userDispatch } = useContext(UserContext);
    const navigation = useNavigation();

    const [nameField, setNameField] = useState('');
    const [emailField, setEmailField] = useState('');
    const [passwordField, setPasswordField] = useState('');

    const handleSignClick = async () => {
        if(nameField != '' && emailField != '' && passwordField != '') {
            let json = await UserApi.signUp(nameField, emailField, passwordField);
            
            if(json.plainTextToken){
                await AsyncStorage.setItem('token', json.plainTextToken);

                navigation.reset({
                    routes:[{name:'MainTab'}]
                });
            }
            else{
                alert(json);
            }
        } else {
            alert("Preencha os campos");
        }
    }

    const handleMessageButtonClick = () => {
        navigation.reset({
            routes: [{name: 'SignIn'}]
        });
    }
    const handleEmpoloyeeCreateRedirect = () => {
        navigation.reset({
            routes: [{name: 'EmployeeCreate'}]
        });
    }

    return (
        <ContainerCenter>
            <FaxinaLogo width="100%" height="160" />

            <InputAreaCol>
                <SignInput
                    IconSvg={PersonIcon}
                    placeholder="Digite seu nome"
                    value={nameField}
                    onChangeText={t=>setNameField(t)}
                />

                <SignInput
                    IconSvg={EmailIcon}
                    placeholder="Digite seu e-mail"
                    value={emailField}
                    onChangeText={t=>setEmailField(t)}
                />

                <SignInput
                    IconSvg={LockIcon}
                    placeholder="Digite sua senha"
                    value={passwordField}
                    onChangeText={t=>setPasswordField(t)}
                    password={true}
                />

                <CustomButton onPress={handleSignClick}>
                    <CustomButtonText>CADASTRAR</CustomButtonText>
                </CustomButton>
            </InputAreaCol>

            <SignMessageButton onPress={handleMessageButtonClick}>
                <SignMessageButtonText>Já possui uma conta?</SignMessageButtonText>
                <SignMessageButtonTextBold>Faça Login</SignMessageButtonTextBold>
            </SignMessageButton>
            <SignMessageButton onPress={handleEmpoloyeeCreateRedirect}>
                <SignMessageButtonText>Deseja se tornar um colaborador</SignMessageButtonText>
                <SignMessageButtonTextBold>Cadastre-se aqui.</SignMessageButtonTextBold>
            </SignMessageButton>
        </ContainerCenter>
    );
}