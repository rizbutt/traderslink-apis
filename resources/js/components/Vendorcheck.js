import React from 'react';
import ReactDOM from 'react-dom';

function Vendorcheck( ) {
    const handleChange = () => { 
    
        console.log('The checkbox was toggled'); 
        
      };
    return (
        <div class="row mb-3">
        <label class="col-md-4 col-form-label text-md-end" for="flexCheckDefault">Register As Vendor</label>

        <div class="col-md-5">
        <input type="checkbox" name="type" onChange={handleChange} />
            {/* <input class="form-check-input" type="checkbox" value="" onChange={handleChange} /> */}
        </div>
    </div>
    );

}
export default Vendorcheck;

if (document.getElementById('vendorcheck')) {
    ReactDOM.render(<Vendorcheck />, document.getElementById('vendorcheck'));
}