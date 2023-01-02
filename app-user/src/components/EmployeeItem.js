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
    max-width:70%;
`;

const UserName = styled.Text`
    color: #00BAF4;
    font-size: 17px;
    font-weight: bold;
`;

const SeeProfileButton = styled.View`
    width: 85px;
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
const CategorieArea = styled.View`
    display:flex;
    flex-wrap:wrap;
    flex-direction:row;
    max-width: 100%;
    
`;
const CategorieItem = styled.View`

    border: 1px solid #00BAF4;
    border-radius: 10px;
    justify-content: center;
    align-items: center;
    padding:5px;
    margin:5px;
`;
const CategorieText = styled.Text`
    font-size: 13px;
    color: #00BAF4;
`;

export default ({data}) => {
    const navigation = useNavigation();
    let categories =  JSON.parse(data.categories);
    const handleEmployeeClick = () => {
        navigation.navigate('Employee',{
            id: data.id,
            name: data.name,
            score: data.score,
            avatar: data.avatar,
            description: data.description,
            categories: categories
        });
    }
    
    return (
        <Area onPress={handleEmployeeClick}>
            <Avatar source={{uri: data.avatar}} />
            <InfoArea>
                <UserName>{data.name}</UserName>
                <Stars stars={data.score} showNumber={true} />

                {/* <SeeProfileButton>
                    <SeeProfileButtonText>Ver Perfil</SeeProfileButtonText>
                </SeeProfileButton> */}
                
                <CategorieArea>
                    {categories && categories.map((item, k)=>(
                        <CategorieItem key={k}>
                                <CategorieText>
                                    {item}
                                </CategorieText>
                        </CategorieItem>
                        
                    ))}
                </CategorieArea>

            </InfoArea>
        </Area>
    );
}