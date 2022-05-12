import React, { useState, useContext } from 'react';
import { useNavigation } from '@react-navigation/native';
import { Alert, Text } from 'react-native';
import {createEmployee} from '../../api/EmployeeApi'
import firestore from '@react-native-firebase/firestore'
import auth from '@react-native-firebase/auth'

import {
    Container,
    InputArea,
    CustomButton,
    CustomButtonText,
    SignMessageButton,
    SignMessageButtonTextBold
} from './styles';

// import { GoogleSignin } from '@react-native-google-signin/google-signin';

// GoogleSignin.configure({
//     webClientId: '527003962976-lm7mtu24ndb0k2o2m4nago907dhpmm50.apps.googleusercontent.com',
//   });



import SignInput from '../../components/SignInput';
import Checkbox from '../../components/Checkbox';


import FaxinaLogo from '../../assets/logo/04.svg';
import EmailIcon from '../../assets/email.svg';
import LockIcon from '../../assets/lock.svg';
import PersonIcon from '../../assets/person.svg';


export default () => {
    // const { dispatch: userDispatch } = useContext(UserContext);
    const navigation = useNavigation();

    const [nameField, setNameField] = useState('');
    const [emailField, setEmailField] = useState('');
    const [passwordField, setPasswordField] = useState('');

    const handleNewEmployeeButtonClick = async () => {
        if(nameField != '' && emailField != '' && passwordField != '') {
            auth()
        .createUserWithEmailAndPassword(emailField, passwordField)
        .then(() => {
            Alert.alert("Conta", "Cadastrado com sucesso");
            auth()
                .currentUser
                .updateProfile({
                    displayName: nameField,
                    photoURL: 'https://cdn1.vectorstock.com/i/1000x1000/20/65/man-avatar-profile-vector-2137206' +
                            '5.jpg'
                });
            Alert.alert("Teste", "Teste aaaa.")
            const userId = auth().currentUser.uid;
            firestore()
                .collection('enployees')
                .add({
                    name: nameField,
                    avatar: 'https://cdn1.vectorstock.com/i/1000x1000/20/65/man-avatar-profile-vector-2137206' +
                            '5.jpg',
                    email: emailField,
                    userId,
                    charge_transport: false,
                    transport_value: 0.00,
                    stars: 5.00,
                    created_at: firestore
                        .FieldValue
                        .serverTimestamp()
                })
                .then(() => Alert.alert("Colaborador", "Colaborador criado com sucesso."))
                .catch((error) => console.log(error));
        })
        .catch((error) => console.log(error));
        } else {
            alert("Preencha os campos");
        }
    }
    const handleBackButtonClick = async () => {
        navigation.reset({
            routes: [{name: 'MainTab'}]
        });
    }
    

    return (
        <Container>
            <FaxinaLogo width="100%" height="160" />
            <Text>Cadastro de Colaborador</Text>
            <InputArea>
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
                {/* <Checkbox /> */}


                <CustomButton onPress={handleNewEmployeeButtonClick}>
                    <CustomButtonText>Cadastrar</CustomButtonText>
                </CustomButton>
                <SignMessageButton onPress={handleBackButtonClick}>
                    <SignMessageButtonTextBold>Voltar</SignMessageButtonTextBold>
                </SignMessageButton>
            </InputArea>
            
        </Container>
    );
}