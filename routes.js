import React from 'react'
import {BrowserRouter, Route, Switch, Link} from 'react-router-dom'

import App from './src/client/App'
import Resume from './src/client/Resume/ResumeController'

export default () => {
    return (
        <BrowserRouter>
            <Switch>
                <Route path="/" component={App}/>

                <Route path="/resume" component={Resume} />
            </Switch>
        </BrowserRouter>
    )
}