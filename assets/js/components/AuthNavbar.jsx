import React from 'react';
import PropTypes from 'prop-types'

export default function AuthNavbar(props) {
  return (
    <div className="flex px-8 justify-between">
      <div className="flex">
        <a className="no-underline text-blue-darker" href="/">
          Home
        </a>
      </div>

      <div className="flex">
        Welcome, {props.username}
        <a className="no-underline text-blue-darker ml-4" href="/post/new">
          Create Post
        </a>
        <a className="no-underline text-blue-darker ml-4" href="/logout">
          Logout
        </a>
      </div>
    </div>
  );
}

AuthNavbar.propTypes = {
  username: PropTypes.string
}