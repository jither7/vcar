import React from 'react'
import ReactDOM from 'react-dom'
import {Provider} from 'react-redux'

import store from  './store'
import Routers from './routes';
import DevTools from './DevTools'

const isProduction = process.env.NODE_ENV === 'production';

ReactDOM.render(
    <Provider store={store}>
       <div>
           <Routers />

           {!isProduction && <DevTools />}
       </div>
    </Provider>,
    document.getElementById('app')
);