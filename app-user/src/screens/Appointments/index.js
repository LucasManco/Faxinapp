import React, { useState, useEffect } from 'react';
import { Text } from 'react-native';
import { useNavigation, useIsFocused } from '@react-navigation/native';
import { Platform, RefreshControl } from 'react-native';
import DropDownPicker from 'react-native-dropdown-picker';

import {getJobs} from '../../api/JobApi'
import JobItem from '../../components/JobItem';

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

import {
    AppointmentsHeader
    
} from './styles';


export default () => {
    const [jobList, setJobList] = useState([]);
    const isFocused = useIsFocused();
    const [refreshing, setRefreshing] = useState(false);
    const [loading, setLoading] = useState(false);
    const [openStatus, setOpenStatus] = useState(false);
    const [selectedStatus, setSelectedStatus] = useState('');
    const [items, setItems] = useState([
        {label: 'Todos', value: ''},
        {label: 'Solitado', value: 'requested'},
        {label: 'Confirmado', value: 'confirmed'},
        {label: 'Finalizado', value: 'done'},
        {label: 'Cancelado', value: 'canceled'},
      ]);

    const getJobList = async () => {
        setLoading(true);

        getJobs(setJobList,selectedStatus);

        setLoading(false);
    }

    useEffect(()=>{
        getJobList();
    }, [selectedStatus]);

    useEffect(()=>{
        if(isFocused){ 
            getJobList();
        }
    }, [isFocused]);

    const onRefresh = () => {
        setRefreshing(false);
        getJobList();
    }

    return (
        <Container>
            <AppointmentsHeader>

                <DropDownPicker
                        open={openStatus}
                        value={selectedStatus}
                        items={items}
                        setOpen={setOpenStatus}
                        setValue={setSelectedStatus}
                        setItems={setItems}
                        style={{
                            borderColor: "#00b4d8",
                            color: "#00b4d8"
                        }}
                        textStyle={{
                            color: "#00b4d8"

                        }}
                        containerStyle={{
                            borderColor: "#00b4d8"
                        }}
                        labelStyle={{
                            color: "#00b4d8"
                        }}

                        mode="SIMPLE"
                        badgeDotColors={["#e76f51", "#00b4d8", "#e9c46a", "#e76f51", "#8ac926", "#00b4d8", "#e9c46a"]}
                    />
            </AppointmentsHeader>
 
            <Scroller refreshControl={
                <RefreshControl refreshing={refreshing} onRefresh={onRefresh} />
            }>
                
                <HeaderArea>
                    <HeaderTitle numberOfLines={2}></HeaderTitle>
                </HeaderArea>

               
                {loading &&
                    <LoadingIcon size="large" color="#FFFFFF" />
                }
                
                <ListArea>
                    {jobList && jobList.length > 0 && jobList.map((item, k)=>(
                        <JobItem key={k} data={item} />
                    ))}
                </ListArea>

            </Scroller>
        </Container>
    );
}