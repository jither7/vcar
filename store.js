import {createStore, combineReducers, applyMiddleware, compose} from 'redux'
import reducer from './reducer'
import thunk from 'redux-thunk'

import DevTools from './DevTools'

const initialState = {};

const isProduction = process.env.NODE_ENV === 'production';

let store;

if(isProduction) {
    store = createStore(reducer, initialState, applyMiddleware(thunk))
} else {
    /**
     * Only use the DevTools component when in development.
     */
    const enhancer = compose(
        applyMiddleware(thunk),
        DevTools.instrument()
    );
    store = createStore(reducer, initialState, enhancer);
}

export default store
