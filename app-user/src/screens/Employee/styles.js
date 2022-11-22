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
    font-size: 18px;
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

export const ServiceArea = styled.View`
    margin-top: 30px;
`;

export const ServicesTitle = styled.Text`
    color: #00BAF4;
    font-size: 18px;
    font-weight: bold;
    margin-left: 30px;
    margin-right: 20px;
    margin-bottom: 20px;
`;
export const ServiceItem = styled.View`
    flex-direction:row;
    margin-left: 30px;
    margin-right: 20px;
    margin-bottom: 20px;
`;
export const ServiceInfo = styled.View`
    flex: 1;
`;
export const ServiceName = styled.Text`
    color: #00BAF4;
    font-size: 16px;
    font-weight: bold;
`;
export const ServicePrice = styled.Text`
    color: #00BAF4;
    font-size: 16px;
`;

export const ServiceDescription = styled.Text`
    color: #00BAF4;
    font-size: 14px;
`;
export const ServiceChooseButton = styled.TouchableOpacity`
    background-color: #00BAF4;
    border-radius: 10px;
    padding: 10px 15px;
    align-items: center;
`;
export const ServiceChooseBtnText = styled.Text`
    color: #FFFFFF;
    font-size: 14px;
    font-weight: bold;
    align-items: center;
`;

export const TestimonialArea = styled.View`
    margin-top: 30px;
    padding:20px;
`;

export const TestimonialItem = styled.View`
    background-color: #00BAF4;
    padding: 15px;
    border-radius: 10px;
    height: 110px;
    justify-content: center;
`;
export const TestimonialInfo = styled.View`
    flex-direction:row;
    justify-content: space-between;
    margin-bottom: 5px;
`;
export const TestimonialName = styled.Text`
    color: #FFFFFF;
    font-size: 14px;
    font-weight: bold;
`;
export const TestimonialBody = styled.Text`
    color: #FFFFFF;
    font-size: 13px;
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