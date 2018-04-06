import React from 'react'
import {BrowserRouter, Route, Switch, Link} from 'react-router-dom'

import App from '../App'
import Resume from '../container/Resume/ResumeController'

export default () => {
    return (
        <BrowserRouter>
            <Switch>
                <Route path="/resume" component={Resume} />

                <Route path="/" component={App}/>
            </Switch>
        </BrowserRouter>
    )
}