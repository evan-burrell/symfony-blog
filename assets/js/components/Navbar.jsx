import React from 'react';
import PropTypes from 'prop-types';
import Home from './navbarPartials/Home';
import Unauthenticated from './navbarPartials/Unauthenticated';
import Authenticated from './navbarPartials/Authenticated'

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
