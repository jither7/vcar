import React, {Component} from 'react'
import {connect} from 'react-redux'
import ResumeListView from './ResumeListView'

class ResumeContainer extends Component {
    constructor(props) {
        super(props)
    }

    render() {
        return <ResumeListView {...this.props}/>
    }
}

export default ResumeContainer;