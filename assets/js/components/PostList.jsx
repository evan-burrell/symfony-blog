import React, { useState, useEffect } from 'react';
import axios from 'axios';
import Post from './Post';
import Loading from 'react-simple-loading';

export default function PostList() {
  const [posts, setPosts] = useState([]);

  useEffect(async () => {
    const url = 'http://symfony-blog.ampdev.co/api/posts';
    const response = await axios.get(url);
    setPosts(response.data);
  }, []);

  return posts ? (
    posts.map(({ slug, title, username }, i) => (
      <Post key={i} slug={slug} title={title} username={username} />
    ))
  ) : (
    <div>
      <Loading />
    </div>
  );
}
