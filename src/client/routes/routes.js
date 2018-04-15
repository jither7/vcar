import React from 'react'
import {BrowserRouter, Route, Switch, Link} from 'react-router-dom'

import App from '../App'
import ResumeContainer from '../container/Customer/Resume/ResumeContainer'

export default () => {
    return (
        <BrowserRouter>
            <Switch>
                <Route path="/resume" component={ResumeContainer} />

                <Route path="/" component={App}/>
            </Switch>
        </BrowserRouter>
    )
}