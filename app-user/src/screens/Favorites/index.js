import React, { useState, useEffect } from 'react';
import { Platform, RefreshControl } from 'react-native';
import { useNavigation, useIsFocused } from '@react-navigation/native';

import DatePicker from 'react-native-date-picker';
import {getFavorites, getDefaultAddress} from '../../api/EmployeeApi'


import {
    Container,
    Scroller,

    HeaderArea,
    HeaderTitle,
    SearchButton,
    CustomButton,
    CustomButtonText,
    LoadingIcon,
    ListArea,
    LocationArea,
    LocationChangeButton,
    LocationText,
    
} from '../../assets/styles/common';


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
    const [date, setDate] = useState(new Date())
    const [open, setOpen] = useState(false)

    

    const getEmployeesList = async () => {
        setLoading(true);

        getFavorites(setEmployees);

        setLoading(false);
    }

    const getCurrentAddress = async () => {
        setLoading(true);

        getDefaultAddress(setAddress);

        setLoading(false);
    }

   
    useEffect(()=>{
        getEmployeesList();
    }, [date, address]);

    useEffect(()=>{
        if(isFocused){ 
            console.log(date);
        }
    }, [isFocused]);

    const onRefresh = () => {
        setRefreshing(false);
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