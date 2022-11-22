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
        
         <input type="checkbox" 
            callback={handleCheckboxChange}
            checked={checked}
         />        
        
   );
}