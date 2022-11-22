import React from 'react';
import styled from 'styled-components/native';
import { useNavigation } from '@react-navigation/native';
import Stars from '../components/Stars';

const Area = styled.TouchableOpacity`
    background-color: #FFFFFF;
    border: 1px solid #00BAF4;
    margin-bottom: 20px;
    border-radius: 20px;
    padding: 15px;
    flex-direction: row;
`;

const Avatar = styled.Image`
    width: 88px;
    height: 88px;
    border-radius: 20px;
`;

const InfoArea = styled.View`
    margin-left: 20px;
    justify-content: space-between;
`;

const UserName = styled.Text`
    color: #00BAF4;
    font-size: 17px;
    font-weight: bold;
`;
const Status = styled.Text`
    color: #444;
    font-size: 14px;
    font-weight: normal;
`;
const Start = styled.Text`
    color: #444;
    font-size: 10px;
    font-weight: normal;
`;

const SeeProfileButton = styled.View`
    width: 150px;
    height: 26px;
    border: 1px solid #00BAF4;
    border-radius: 10px;
    justify-content: center;
    align-items: center;
`;

const SeeProfileButtonText = styled.Text`
    font-size: 13px;
    color: #00BAF4;
`;


export default ({data}) => {
    const navigation = useNavigation();

    const handleJobClick = () => {
        navigation.navigate('Job',{
            id: data.id,
            name: data.name,
            stars: data.stars,
            avatar: data.profile_image,
            status: data.status,
            start: data.start
        });
    }
    return (
        <Area onPress={handleJobClick}>
            <Avatar source={{uri: data.profile_image}} />

            <InfoArea>
                <UserName>{data.name}</UserName>
                <Status>{data.status}</Status>
                <Start>Agendado para: {data.start}</Start>
                <SeeProfileButton>
                    <SeeProfileButtonText>Mais Detalhes</SeeProfileButtonText>
                </SeeProfileButton>
            </InfoArea>
        </Area>
    );
}