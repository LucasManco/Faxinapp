import React, { useState, useContext } from 'react';
import { useNavigation } from '@react-navigation/native';
import AsyncStorage from '@react-native-community/async-storage';

import { UserContext } from '../../contexts/UserContext';

import {
    Container,
    InputArea,
    CustomButton,
    CustomButtonText,
    SignMessageButton,
    SignMessageButtonText,
    SignMessageButtonTextBold
} from './styles';

// import { GoogleSignin } from '@react-native-google-signin/google-signin';

// GoogleSignin.configure({
//     webClientId: '527003962976-lm7mtu24ndb0k2o2m4nago907dhpmm50.apps.googleusercontent.com',
//   });



import SignInput from '../../components/SignInput';

import FaxinaLogo from '../../assets/logo/04.svg';
import EmailIcon from '../../assets/email.svg';
import LockIcon from '../../assets/lock.svg';
import { Alert } from 'react-native';

import UserApi from '../../api/UserApi'

export default () => {
    // const { dispatch: userDispatch } = useContext(UserContext);
    const navigation = useNavigation();

    const [emailField, setEmailField] = useState('');
    const [passwordField, setPasswordField] = useState('');

    const handleSignClick = async () => {
        // if(emailField != '' && passwordField != '') {
            //let json = await UserApi.signIn(emailField, passwordField);
            
            //if(json.plainTextToken){
               // await AsyncStorage.setItem('token', json.plainTextToken);

                navigation.reset({
                    routes:[{name:'MainTab'}]
                });
            //}
            //else{
              //  alert(json);
//            }

        // } else {
        //     alert("Preencha os campos!");
        // }
    }

    const handleMessageButtonClick = () => {
        navigation.reset({
            routes: [{name: 'SignUp'}]
        });
    }
    const handleMissPasswordButtonClick = () => {
        navigation.reset({
            routes: [{name: 'ForgotPassword'}]
        });
    }
    // async function onGoogleButtonPress() {
    //     // Get the users ID token
    //     const { idToken } = await GoogleSignin.signIn();

    //     // Create a Google credential with the token
    //     const googleCredential = auth.GoogleAuthProvider.credential(idToken);

    //     // Sign-in the user with the credential
    //     return auth().signInWithCredential(googleCredential);    
    // }
    

    return (
        <Container>
            <FaxinaLogo width="100%" height="160" />

            <InputArea>
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
                    <CustomButtonText>LOGIN</CustomButtonText>
                </CustomButton>
            </InputArea>
            
             {/* <CustomButton onPress={() => onGoogleButtonPress().then(() => console.log('Signed in with Google!'))}>
                <CustomButtonText>Google Sign-In</CustomButtonText>
            </CustomButton> */}

            <SignMessageButton onPress={handleMessageButtonClick}>
                <SignMessageButtonText>Ainda não possui uma conta?</SignMessageButtonText>
                <SignMessageButtonTextBold>Cadastre-se</SignMessageButtonTextBold>
            </SignMessageButton>

            {/* <SignMessageButton onPress={handleMissPasswordButtonClick}>
                <SignMessageButtonText>Esqueceu sua Senha?</SignMessageButtonText>
            </SignMessageButton> */}
        </Container>
    );
}