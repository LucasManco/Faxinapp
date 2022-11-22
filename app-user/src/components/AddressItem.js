import React from 'react';
import styled from 'styled-components/native';
import { useNavigation } from '@react-navigation/native';
import StarFull from '../assets/star.svg';
import StarEmpty from '../assets/star_empty.svg';
import {setDefaultAddress} from '../api/UserApi'
import { RefreshControl } from 'react-native';

const Container = styled.SafeAreaView`
    flex: 1;
    background-color: #FFFFFF;
    border: 1px solid #00BAF4;
    margin-bottom: 20px;
    border-radius: 20px;
    padding: 15px;
    flex-direction: row;
    justify-content: space-between;
`;

const Area = styled.TouchableOpacity`
    
`;

const InfoArea = styled.View`
    margin-left: 20px;
    justify-content: space-between;
`;

const AddressLine01 = styled.Text`
    color: #00BAF4;
    font-size: 17px;
    font-weight: bold;
`;

const AddressLine02 = styled.Text`
    color: #00BAF4;
    font-size: 14px;
    font-weight: normal;
`;

const AddressLine03 = styled.Text`
    color: #00BAF4;
    font-size: 12px;
    font-weight: normal;
`;




export default ({data, setAddresses}) => {
    const navigation = useNavigation();

    const handleAddressClick = () => {
        navigation.navigate(
            'AddressEdit',{
                id: data.id
            }
        );
    }
    const handleSetDefault = () => {
        setDefaultAddress(data.id, setAddresses);
    }
    return (
        <Container>
        <Area onPress={handleAddressClick}>
            <InfoArea>
                <AddressLine01>{data.street}, {data.number}</AddressLine01>
                <AddressLine02>{data.city} - {data.state}</AddressLine02>
                <AddressLine03>{data.complement}</AddressLine03>
            </InfoArea>
        </Area>
        {
            data.isDefault &&
                <StarFull width="18" height="18" fill="#00BAF4" />
        }
        {
            !data.isDefault &&
                <Area onPress={handleSetDefault}>
                    <StarEmpty width="18" height="18" fill="#00BAF4" />
                </Area>
        }
        </Container>
    );
}