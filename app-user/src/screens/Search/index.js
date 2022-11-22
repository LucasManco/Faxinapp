import React, { useState, useEffect } from 'react';
import { Platform, RefreshControl } from 'react-native';
import { useNavigation, useIsFocused } from '@react-navigation/native';


import {getEmployees, getDefaultAddress} from '../../api/EmployeeApi'


import {
    Container,
    Scroller,

    HeaderArea,
    HeaderTitle,
    SearchButton,

    LoadingIcon,
    ListArea,
    LocationArea,
    LocationChangeButton,
    LocationText,
    
} from '../../assets/styles/common';


import EmployeeItem from '../../components/EmployeeItem';

import SearchIcon from '../../assets/search.svg';
import MyLocationIcon from '../../assets/my_location.svg';
import DatePicker from "../../components/DatePicker";

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
        }
    }, [isFocused]);

    const onRefresh = () => {
        setRefreshing(false);
        getCurrentAddress();
    }
    
    const changeDefaultAddressHanddler = () => {
        navigation.navigate(
            'AddressIndex'
        );
    }
    return (
        <Container>
            <Scroller refreshControl={
                <RefreshControl refreshing={refreshing} onRefresh={onRefresh} />
            }>

                <LocationArea>
                    <LocationChangeButton onPress={changeDefaultAddressHanddler}>
                        <LocationText>{address}</LocationText>
                    </LocationChangeButton>
                </LocationArea>

                <DatePicker />


                {loading &&
                    <LoadingIcon size="large" color="#FFFFFF" />
                }
                
                <ListArea>
                    {employees && employees.map((item, k)=>(
                        <EmployeeItem key={k} data={item} />
                    ))}
                </ListArea>

            </Scroller>
        </Container>
    );
}