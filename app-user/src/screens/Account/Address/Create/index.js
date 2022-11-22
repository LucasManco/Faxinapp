import React, { useState, useEffect } from 'react';
import { Platform, RefreshControl } from 'react-native';
import { useNavigation, useRoute } from '@react-navigation/native';

import {storeAddress} from '../../../../api/UserApi'


import {    
} from './styles';

import {
    Container,
    BackButton,
    NoPaddingScroller,
    Header,
    PageBody,
    

    Input,
    InputArea,
    CustomButton,
    CustomButtonText,
    LoadingIcon,
    
    
} from '../../../../assets/styles/common';

import {
    AddressTitle
}from './styles';

import BackIcon from '../../../../assets/back.svg';


export default () => {
    const route = useRoute();

    const navigation = useNavigation();

    const [loading, setLoading] = useState(false);
    const [refreshing, setRefreshing] = useState(false);
    
    const [postalCodeField, setPostalCodeField] = useState('');
    const [streetField, setStreetField] = useState('');
    const [numberField, setNumberField] = useState('');
    const [cityField, setCityField] = useState('');
    const [stateField, setStateField] = useState('');
    const [complementField, setComplementField] = useState('');


    const onRefresh = () => {
        setRefreshing(false);
        getAddressesList();
    }
    const handleBackButton = () => {
        navigation.goBack();
    }
    const handleSaveClick = () => {
        addressToSend = {};
        addressToSend.postal_code = postalCodeField;
        addressToSend.street = streetField;
        addressToSend.number = numberField;
        addressToSend.city = cityField;
        addressToSend.state = stateField;
        addressToSend.complement = complementField;
        addressToSend.country = 'Brasil';

        storeAddress(addressToSend);
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
                    <AddressTitle numberOfLines={2}>Editar Endereço</AddressTitle>

                    {loading &&
                        <LoadingIcon size="large" color="#FFFFFF" />
                    }
                    
                    <InputArea>
                        <Input
                            placeholder="CEP"
                            placeholderTextColor="#00BAF4"
                            value={postalCodeField}
                            onChangeText={setPostalCodeField}
                        />
                    </InputArea>
                    <InputArea>
                        <Input
                            placeholder="Rua"
                            placeholderTextColor="#00BAF4"
                            value={streetField}
                            onChangeText={setStreetField}
                        />
                    </InputArea>
                    <InputArea>
                        <Input
                            placeholder="Numero"
                            placeholderTextColor="#00BAF4"
                            value={numberField}
                            onChangeText={setNumberField}
                        />
                    </InputArea>
                    <InputArea>
                        <Input
                            placeholder="Cidade"
                            placeholderTextColor="#00BAF4"
                            value={cityField}
                            onChangeText={setCityField}
                        />
                    </InputArea>
                    <InputArea>
                        <Input
                            placeholder="Estado"
                            placeholderTextColor="#00BAF4"
                            value={stateField}
                            onChangeText={setStateField}
                        />
                    </InputArea>
                    <InputArea>
                        <Input
                            placeholder="Complemento"
                            placeholderTextColor="#00BAF4"
                            value={complementField}
                            onChangeText={setComplementField}
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