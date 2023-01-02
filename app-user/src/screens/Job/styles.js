import React from 'react';
import styled from 'styled-components/native';



export const UserInfoArea = styled.View`
    flex-direction: row;
    margin-top: -35px;
`;

export const UserAvatar = styled.Image`
    width: 110px;
    height: 110px;
    border-radius: 20px;
    margin-left: 30px;
    margin-right: 20px;
    border-width: 4px;
    border-color: #FFFFFF;
`;
export const UserInfo = styled.View`
    flex: 1;
    justify-content: flex-end;
`;

export const UserInfoName = styled.Text`
    color: #000000;
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 10px;
`;
export const UserFavButton = styled.TouchableOpacity`
    width: 40px;
    height: 40px;
    background-color: #FFFFFF;
    border: 2px solid #999999;
    border-radius: 20px;
    justify-content: center;
    align-items: center;
    margin: 20px;
`;


export const BackButton = styled.TouchableOpacity`
    position: absolute;
    left: 0;
    top: 0;
    z-index: 9;
`

export const LoadingIcon = styled.ActivityIndicator`
    margin-top: 50px;
`;

export const Status = styled.Text`
    color: #444;
    font-size: 20px;
    font-weight: normal;
`;
export const Start = styled.Text`
    color: #444;
    font-size: 18px;
    font-weight: normal;
`;
export const JobDetails = styled.View`
    margin: 20px;
`;
export const Observation = styled.Text`
    color: #444;
    font-size: 18px;
    font-weight: normal;
`;
export const Address = styled.Text`
    color: #444;
    font-size: 18px;
    font-weight: normal;
`;
export const JobTypeArea = styled.View`
    margin-top: 20px;
`;
export const JobTypeDetails = styled.View`
    flex: 1;
    flex-direction:row;
`;
export const JobtypeName = styled.Text`
    color: #444;
    font-size: 18px;
    font-weight: bold;
    margin-right:5px;
`;
export const JobtypePrice = styled.Text`
    color: #444;
    font-size: 18px;
    font-weight: normal;
`;
export const JobTypeAdditionalsDetails = styled.View`
    margin: 20px;
`;
export const JobTypeAdditionalsItem = styled.View`
    
    flex: 1;
    flex-direction:row;
`;
export const JobTypeAdditionalsTitle = styled.Text`
    color: #444;
    font-size: 22px;
    font-weight: bold;
    margin-right:5px;
`;
export const JobTypeAdditionalsName = styled.Text`
    color: #444;
    font-size: 18px;
    font-weight: bold;
    margin-right:5px;
`;
export const JobTypeAdditionalsPrice = styled.Text`
    color: #444;
    font-size: 18px;
    font-weight: normal;
`;
export const PriceDetails = styled.View`
    
`;
export const PriceArea = styled.View`
    flex: 1;
    flex-direction:row;
`;
export const PriceTitle = styled.Text`
    color: #444;
    font-size: 18px;
    font-weight: bold;
    margin-right:5px;
`;
export const PriceValue = styled.Text`
    color: #444;
    font-size: 18px;
    font-weight: normal;
`;
export const CategorieArea = styled.View`
    display:flex;
    flex-wrap:wrap;
    flex-direction:row;
    max-width: 100%;
    
`;
export const CategorieItem = styled.View`

    border: 1px solid #00BAF4;
    border-radius: 10px;
    justify-content: center;
    align-items: center;
    padding:5px;
    margin:5px;
`;
export const CategorieText = styled.Text`
    font-size: 13px;
    color: #00BAF4;
`;