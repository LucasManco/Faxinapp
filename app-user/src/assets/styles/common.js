import React from 'react';
import styled from 'styled-components/native';

export const Container = styled.SafeAreaView`
    flex: 1;
    background-color: #FFFFFF;
`;

export const ContainerCenter = styled.SafeAreaView`
    flex: 1;
    background-color: #FFFFFF;
    justify-content: center;
    align-items: center;
`;

export const BackButton = styled.TouchableOpacity`
    position: absolute;
    left: 0;
    top: 0;
    z-index: 9;
`

export const Scroller = styled.ScrollView`
    flex: 1;
    padding: 20px;
`;

export const NoPaddingScroller = styled.ScrollView`
    flex: 1;
`;

export const PageBody = styled.View`
    background-color: #ffffff;
    border-top-left-radius: 50px;
    margin-top: -50px;
`;

export const Header = styled.View`
    height:200px;
    background-color: #00BAF4;
    margin: -20px;
    flex: 1;
`;

export const HeaderArea = styled.View`
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
`;
export const HeaderTitle = styled.Text`
    width: 250px;
    font-size: 24px;
    font-weight: bold;
    color: #00BAF4;
`;

export const SearchButton = styled.TouchableOpacity`
    width: 26px;
    height: 26px;
`;

export const LocationArea = styled.View`
    background-color: #00BAF4;
    height: 60px;
    border-radius: 30px;
    flex-direction: row;
    align-items: center;
    padding-left: 20px;
    padding-right: 20px;
    margin-top: 30px;
`;

export const LocationChangeButton = styled.TouchableOpacity`
    width: 24px;
    height: 24px;
`;

export const LocationText = styled.Text`
    width: 250px;
    font-size: 24px;
    font-weight: bold;
    color: #FFFFFF;
`;


export const LoadingIcon = styled.ActivityIndicator`
    margin-top: 50px;
`;
export const ListArea = styled.View`
    margin-top: 30px;
    margin-bottom: 30px;
`;


export const InputArea = styled.View`
    // width: 100%;
    height: 60px;
    background-color: #FFFFFF;
    border: 1px solid #00BAF4;
    flex-direction: row;
    border-radius: 30px;
    padding-left: 15px;
    align-items: center;
    margin-bottom: 15px;
    margin-left:20px;
    margin-right:20px;
`;
export const InputAreaCol = styled.View`
    width: 100%;
    padding: 40px;
`;
export const Input = styled.TextInput`
    flex: 1;
    font-size: 16px;
    color: #00BAF4;
    margin-left: 10px;
`;

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


