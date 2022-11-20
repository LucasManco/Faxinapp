import React, { useState, useEffect } from 'react';
import { Platform, RefreshControl } from 'react-native';
import { useNavigation, useIsFocused } from '@react-navigation/native';

import { request, PERMISSIONS } from 'react-native-permissions';
import Geolocation from '@react-native-community/geolocation';

import {getEmployees, getDefaultAddress} from '../../api/EmployeeApi'


import {
    Container,
    Scroller,

    HeaderArea,
    HeaderTitle,
    SearchButton,

    LocationArea,
    LocationChangeButton,
    LocationText,


    LoadingIcon,
    ListArea
    
} from './styles';

import EmployeeItem from '../../components/EmployeeItem';

import SearchIcon from '../../assets/search.svg';
import MyLocationIcon from '../../assets/my_location.svg';

export default () => {
    const navigation = useNavigation();

    const [address, setAddress] = useState('');
    
    const [loading, setLoading] = useState(false);
    const [refreshing, setRefreshing] = useState(false);
    const [employees, setEmployees] = useState([]);
    const isFocused = useIsFocused();

    

    const getEmployeesList = async () => {
        setLoading(true);

        getEmployees(setEmployees);

        setLoading(false);
    }

    const getCurrentAddress = async () => {
        setLoading(true);

        getDefaultAddress(setAddress);

        setLoading(false);
    }

    useEffect(()=>{
        if(isFocused){ 
            getCurrentAddress();
            getEmployeesList();
        }
    }, [isFocused]);

    const onRefresh = () => {
        setRefreshing(false);
        getEmployeesList();
        getCurrentAddress();
    }
    
    const changeDefaultAddressHanddler = () => {
        navigation.navigate(
            'Address'
        );
    }
    return (
        <Container>
            <Scroller refreshControl={
                <RefreshControl refreshing={refreshing} onRefresh={onRefresh} />
            }>
                
                <HeaderArea>
                    <HeaderTitle numberOfLines={2}>Encontre uma Faxineira.</HeaderTitle>
                    <SearchButton onPress={()=>navigation.navigate('Search')}>
                        <SearchIcon width="26" height="26" fill="#FFFFFF" />
                    </SearchButton>
                </HeaderArea>

                <LocationArea>
                    <LocationChangeButton onPress={changeDefaultAddressHanddler}>
                        <LocationText>{address}</LocationText>
                    </LocationChangeButton>
                </LocationArea>

                {loading &&
                    <LoadingIcon size="large" color="#FFFFFF" />
                }
                
                <ListArea>
                    {employees.map((item, k)=>(
                        <EmployeeItem key={k} data={item} />
                    ))}
                </ListArea>

            </Scroller>
        </Container>
    );
}