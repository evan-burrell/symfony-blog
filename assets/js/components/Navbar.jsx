import React from 'react';
import PropTypes from 'prop-types';
import Home from './Home';
import Unauthenticated from './Unauthenticated';
import Authenticated from './Authenticated'

function Wrapper(props) {
  return <div className="flex px-8 justify-between">{props.children}</div>;
}

export default function Navbar({ username }) {
  return username ? (
    <Wrapper>
      <Home />
      <Authenticated username={username} />
    </Wrapper>
  ) : (
    <Wrapper>
      <Home />
      <Unauthenticated />
    </Wrapper>
  );
}

Navbar.propTypes = {
  username: PropTypes.string
};
