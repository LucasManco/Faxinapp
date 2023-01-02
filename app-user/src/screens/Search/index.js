import React, { useState, useEffect } from 'react';
import { Platform, RefreshControl } from 'react-native';
import { useNavigation, useIsFocused } from '@react-navigation/native';
import DropDownPicker from 'react-native-dropdown-picker';

import DatePicker from 'react-native-date-picker';
import {searchEmployees, getDefaultAddress} from '../../api/EmployeeApi'


import {
    Container,
    Scroller,

    
    CustomButton,
    CustomButtonText,
    LoadingIcon,
    ListArea,
    LocationArea,
    LocationChangeButton,
    LocationText,
    
} from '../../assets/styles/common';
import {
    SearchHeader,
    DateButton
    
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
    
    const [date, setDate] = useState(new Date())
    const [openDate, setOpenDate] = useState(false)

    const [openCategories, setOpenCategories] = useState(false);
    const [selectedCategories, setSelectedCategories] = useState();
    const [items, setItems] = useState([
        {label: 'Todos', value: ''},
        {label: 'Diarista', value: 'diarista'},
        {label: 'Limpeza de Piscina', value: 'limpesa'},
        {label: 'Passadeira', value: 'passadeira'},
    
        {label: 'Lavadeira', value: 'lavadeira'},
        {label: 'Cozinheira', value: 'cozinheira'},
    
        
      ]);

    const getEmployeesList = async () => {
        setLoading(true);

        searchEmployees(date, address,selectedCategories,setEmployees);

        setLoading(false);
    }

    const getCurrentAddress = async () => {
        setLoading(true);

        getDefaultAddress(setAddress);

        setLoading(false);
    }

   
    useEffect(()=>{
        getEmployeesList();
    }, [date, address,selectedCategories]);

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
            <SearchHeader>
                <LocationArea>
                    <LocationChangeButton onPress={changeDefaultAddressHanddler}>
                        <LocationText>{address}</LocationText>
                    </LocationChangeButton>
                </LocationArea>

                <DateButton title="Open" onPress={() => setOpenDate(true)}>
                    <CustomButtonText>{date ? date.getDate() + ' / ' + (date.getMonth()+1) +' / ' + date.getFullYear(): 'Selecione uma data'}</CustomButtonText>
                </DateButton>
                <DatePicker
                    modal
                    mode = "date"
                    open={openDate}
                    date={date}
                    onConfirm={(date) => {
                    setOpenDate(false)
                    setDate(date)
                    }}
                    onCancel={() => {
                    setOpenDate(false)
                    }}
                    minimumDate={new Date()}                    
                />
                
                <DropDownPicker
                        open={openCategories}
                        value={selectedCategories}
                        items={items}
                        setOpen={setOpenCategories}
                        setValue={setSelectedCategories}
                        setItems={setItems}

                        mode="SIMPLE"
                        badgeDotColors={["#e76f51", "#00b4d8", "#e9c46a", "#e76f51", "#8ac926", "#00b4d8", "#e9c46a"]}
                    />
            </SearchHeader>
            <Scroller refreshControl={
                <RefreshControl refreshing={refreshing} onRefresh={onRefresh} />
            }>
                
                {loading &&
                    <LoadingIcon size="large" color="#FFFFFF" />
                }
                
                <ListArea>
                    {employees && employees.length > 0 && employees.map((item, k)=>(
                        <EmployeeItem key={k} data={item} />
                    ))}
                </ListArea>

            </Scroller>
        </Container>
    );
}