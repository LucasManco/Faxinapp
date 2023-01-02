import React, { useState, useEffect } from 'react';
import { Platform, RefreshControl } from 'react-native';
import { useNavigation, useRoute } from '@react-navigation/native';


import {getUser, updateUser} from '../../../../api/UserApi'


import {    
} from './styles';

import {
    Container,
    BackButton,
    NoPaddingScroller,
    Header,
    PageBody,
    HeaderArea,
    HeaderTitle,

    Input,
    InputArea,
    CustomButton,
    CustomButtonText,
    LoadingIcon,
    ListArea
    
} from '../../../../assets/styles/common';

import {
    AddressTitle
}from './styles';

import AddressItem from '../../../../components/AddressItem';
import BackIcon from '../../../../assets/back.svg';


export default () => {
    const route = useRoute();

    const navigation = useNavigation();

    const [loading, setLoading] = useState(false);
    const [refreshing, setRefreshing] = useState(false);
    const [user, setUser] = useState('');
    const [nameField, setNameField] = useState('');
    const [phoneField, setPhoneField] = useState('');
    const [cpfField, setCpfField] = useState('');
    const [emailField, setEmailField] = useState('');
    const [passwordField, setPasswordField] = useState('');
    const [passwordConfirmationField, setPasswordConfirmationField] = useState('');

    const getAddressesList = async () => {
        setLoading(true);
        getUser(setUser);
        updateUserFields();        
        setLoading(false);
    }

    const updateUserFields = () => {
        setNameField(user.name);
        setPhoneField(user.phone_number);
        setCpfField(user.cpf);
        setEmailField(user.email);
    }

    useEffect(()=>{
        updateUserFields();
    }, [user]);


    useEffect(()=>{
        getAddressesList();
    }, []);

    const onRefresh = () => {
        setRefreshing(false);
        getAddressesList();
    }
    const handleBackButton = () => {
        navigation.goBack();
    }
    const handleSaveClick = () => {
        userToSend = user;
        userToSend.name = nameField;
        userToSend.phone_number = phoneField;
        userToSend.cpf = cpfField;
        userToSend.email = emailField;
        passwordField ? userToSend.password = passwordField : '';
        passwordConfirmationField ? userToSend.password_confirmation = passwordConfirmationField : '';

        updateUser(userToSend);
        navigation.goBack();

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
                    <AddressTitle numberOfLines={2}>Editar Usuário</AddressTitle>

                    {loading &&
                        <LoadingIcon size="large" color="#FFFFFF" />
                    }
                    
                    <InputArea>
                        <Input
                            placeholder="Nome"
                            placeholderTextColor="#00BAF4"
                            value={nameField}
                            onChangeText={setNameField}
                        />
                    </InputArea>
                    <InputArea>
                        <Input
                            placeholder="Telefone"
                            placeholderTextColor="#00BAF4"
                            value={phoneField}
                            onChangeText={setPhoneField}
                        />
                    </InputArea>
                    <InputArea>
                        <Input
                            placeholder="Email"
                            placeholderTextColor="#00BAF4"
                            value={emailField}
                            onChangeText={setEmailField}
                        />
                    </InputArea>
                    <InputArea>
                        <Input
                            placeholder="CPF"
                            placeholderTextColor="#00BAF4"
                            value={cpfField}
                            onChangeText={setCpfField}
                        />
                    </InputArea>
                    <InputArea>
                        <Input
                            placeholder="Senha"
                            placeholderTextColor="#00BAF4"
                            value={passwordField}
                            onChangeText={setPasswordField}
                            secureTextEntry={true}
                        />
                    </InputArea>
                    <InputArea>
                        <Input
                            placeholder="Confirmação de Senha"
                            placeholderTextColor="#00BAF4"
                            value={passwordConfirmationField}
                            onChangeText={setPasswordConfirmationField}
                            secureTextEntry={true}
                        />
                    </InputArea>
                    

                    <CustomButton onPress={handleSaveClick}>
                        <CustomButtonText>Salvar</CustomButtonText>
                    </CustomButton>
                </PageBody>

            </NoPaddingScroller>
        </Container>
    );
}