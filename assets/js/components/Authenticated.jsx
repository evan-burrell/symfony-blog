import React from 'react';
import PropTypes from 'prop-types'

export default function Authenticated({ username }) {
  return (
      <div className="flex">
        Welcome, {username}
        <a className="no-underline text-blue-darker ml-4 hover:underline" href="/post/new">
          Create Post
        </a>
        <a className="no-underline text-blue-darker ml-4 hover:underline" href="/auth0/logout">
          Logout
        </a>
      </div>
  );
}

Authenticated.propTypes = {
  username: PropTypes.string
}
