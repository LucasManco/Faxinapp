import React from 'react';
import styled from 'styled-components/native';

export const Container = styled.SafeAreaView``;

export const CustomButton = styled.TouchableOpacity`
    height: 60px;
    background-color: #00BAF4;
    border-radius: 30px;
    justify-content: center;
    align-items: center;
    margin: 10px;
`;

export const CustomButtonText = styled.Text`
    font-size: 18px;
    color: #FFF;
`;
export const CustomButtonTextSeccundary = styled.Text`
    font-size: 12px;
    color: #FFF;
`;
export const CustomText = styled.Text`
    width: 250px;
    font-size: 24px;
    font-weight: bold;
    color: #00BAF4;
    margin: 0 10px;
`;