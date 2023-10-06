import React, { useState, useContext } from 'react';
import { useNavigation } from '@react-navigation/native';


import { UserContext } from '../../contexts/UserContext';


import {
    Container,
    InputArea,
    CustomButton,
    CustomButtonText
} from '../../assets/styles/common';
import {
    SignMessageButton,
    SignMessageButtonText,
    SignMessageButtonTextBold
} from '../../assets/styles/sign';


/**
 * 
 * TODO: NECESSÁRIO DESENVOLVER UM NOVO MÉTODO DE RECUPERAR A SENHA
 * 
 */
import SignInput from '../../components/SignInput';

import FaxinaLogo from '../../assets/logo/04.svg';
import EmailIcon from '../../assets/email.svg';
import LockIcon from '../../assets/lock.svg';
import { Alert } from 'react-native';

export default () => {
    // const { dispatch: userDispatch } = useContext(UserContext);
    const navigation = useNavigation();

    const [emailField, setEmailField] = useState('');

    const handleSignClick = async () => {
        if(emailField != '') {
                auth()
                    .sendPasswordResetEmail(emailField)
                    .then(() => {
                        Alert.alert("Redefinir senha", "Enviamos um e-mail para você.")
                    })
                    .catch((error) => console.log(error));
                // navigation.reset({
                //     routes:[{name:'MainTab'}]
                // });
        } else {
            alert("Preencha os campos!");
        }
    }

    const handleMessageButtonClick = () => {
        navigation.reset({
            routes: [{name: 'SignIn'}]
        });
    }

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

                <CustomButton onPress={handleSignClick}>
                    <CustomButtonText>Redefinir Senha</CustomButtonText>
                </CustomButton>
            </InputArea>

            <SignMessageButton onPress={handleMessageButtonClick}>
                <SignMessageButtonText>Voltar</SignMessageButtonText>
                {/* <SignMessageButtonTextBold>Cadastre-se</SignMessageButtonTextBold> */}
            </SignMessageButton>

        </Container>
    );
}