import React from 'react';

export default function NoAuthNavbar() {
  return (
    <div className="flex px-8 justify-between">
      <div>
        <a className="no-underline hover:underline text-blue-darker" href="/">
          Home
        </a>
      </div>
      <div>
        <a className="no-underline hover:underline text-blue-darker ml-4" href="/connect/auth0">
          Login
        </a>
      </div>
    </div>
  );
}
