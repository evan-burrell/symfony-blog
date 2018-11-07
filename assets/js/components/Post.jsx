import React from 'react';
import PropTypes from 'prop-types';

export default function Posts({ slug, title, username }) {
  return (
    <div className="group hover:bg-white hover:shadow-inner py-8 px-4 border-b-2 border-grey-lighter">
      <div className="flex items-center justify-between">
        <a
          href={'/post/' + slug}
          className="text-2xl no-underline font-semibold text-blue-darker"
        >
          {title}
        </a>
      </div>
      <div className="text-grey-darker mt-4 text-sm">by {username}</div>
    </div>
  );
}

Posts.propTypes = {
  username: PropTypes.string,
  slug: PropTypes.string,
  title: PropTypes.string
};
