import React from 'react';

export default function Unauthenticated() {
  return (
    <div>
      <a
        className="no-underline hover:underline text-blue-darker ml-4"
        href="/connect/auth0"
      >
        Login
      </a>
    </div>
  );
}
