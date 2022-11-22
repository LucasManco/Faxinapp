import React, { useState, useEffect } from 'react';
import { Platform, RefreshControl } from 'react-native';
import { useNavigation, useRoute } from '@react-navigation/native';
import { request, PERMISSIONS } from 'react-native-permissions';
import Geolocation from '@react-native-community/geolocation';

import {getAddress, updateAddress} from '../../../../api/UserApi'


import {    
} from './styles';

import {
    Container,
    BackButton,
    Scroller,

    HeaderArea,
    HeaderTitle,

    Input,
    InputArea,
    CustomButton,
    CustomButtonText,
    LoadingIcon,
    ListArea
    
} from '../../../../assets/styles/common';

import AddressItem from '../../../../components/AddressItem';
import BackIcon from '../../../../assets/back.svg';


export default () => {
    const route = useRoute();

    const navigation = useNavigation();

    const [loading, setLoading] = useState(false);
    const [refreshing, setRefreshing] = useState(false);
    const [currentDefaultAddress, setCurrentDefaultAddress] = useState('');

    const [addressInfo, setAddressInfo] = useState({
        id: route.params.id
    });

    const [address, setAddress] = useState('');
    const [postalCodeField, setPostalCodeField] = useState('');
    const [streetField, setStreetField] = useState('');
    const [numberField, setNumberField] = useState('');
    const [cityField, setCityField] = useState('');
    const [stateField, setStateField] = useState('');
    const [complementField, setComplementField] = useState('');

    const getAddressesList = async () => {
        setLoading(true);
        getAddress(setAddress, addressInfo.id);
        updateAddressFields();        
        setLoading(false);
    }

    const updateAddressFields = () => {
        setPostalCodeField(address.postal_code);
        setStreetField(address.street);
        setNumberField(address.number);
        setCityField(address.city);
        setStateField(address.state);
        setComplementField(address.complement);
    }

    useEffect(()=>{
        updateAddressFields();
    }, [address]);


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
        addressToSend = address;
        addressToSend.postal_code = postalCodeField;
        addressToSend.street = streetField;
        addressToSend.number = numberField;
        addressToSend.city = cityField;
        addressToSend.state = stateField;
        addressToSend.complement = complementField;

        updateAddress(addressToSend);
        navigation.goBack();

    }
    return (
        <Container>
            <BackButton onPress={handleBackButton}>
                <BackIcon width="44px" height="44px" fill="#FFFFFF" />
            </BackButton>

            <Scroller refreshControl={
                <RefreshControl refreshing={refreshing} onRefresh={onRefresh} />
            }>
                
                <HeaderArea>
                    <HeaderTitle numberOfLines={2}>Editar Endereço</HeaderTitle>
                </HeaderArea>

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
            </Scroller>
        </Container>
    );
}