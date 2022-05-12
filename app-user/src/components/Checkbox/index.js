import React, {useState} from 'react';
import
{
   CheckboxContainer,
   HiddenCheckbox,
   StyledCheckbox,
   Text
} from './styles';

export default () => {
    const [checked, setChecked] = useState(false);
   
    function handleCheckboxChange(){
       setChecked(!checked);
    }

    
   return (
        <CheckboxContainer 
        checked={checked}
        onClick={handleCheckboxChange}
        >
            {/* <HiddenCheckbox 
            onChange={handleCheckboxChange}
            checked={checked}
            />
            <StyledCheckbox checked={checked}/> */}
            <CheckBox
            disabled={false}
            value={isDoctor}
            onValueChange={setIsDoctor}
            tintColors={{ true: '#FC8F00' }}
            />
            <Text checked={checked}>Instagram</Text>
        </CheckboxContainer>
   );
}