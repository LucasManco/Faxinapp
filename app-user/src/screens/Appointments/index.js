import React, { useState, useEffect } from 'react';
import { Text } from 'react-native';
import { useNavigation, useIsFocused } from '@react-navigation/native';
import { Platform, RefreshControl } from 'react-native';

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

export default () => {
    const [jobList, setJobList] = useState([]);
    const isFocused = useIsFocused();
    const [refreshing, setRefreshing] = useState(false);
    const [loading, setLoading] = useState(false);

    const getJobList = async () => {
        setLoading(true);

        getJobs(setJobList);

        setLoading(false);
    }

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
                    {jobList.map((item, k)=>(
                        <JobItem key={k} data={item} />
                    ))}
                </ListArea>

            </Scroller>
        </Container>
    );
}