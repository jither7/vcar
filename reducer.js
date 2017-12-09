import {combineReducers} from 'redux'

const todo = (state = {}, action) => {
    switch (action.type) {
        default:
            return state;
    }
};
const reducer = combineReducers({
    app: todo
});

export default reducer;