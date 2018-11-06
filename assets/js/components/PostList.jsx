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
    posts.map((post, i) => (
      <Post key={i} id={post[0].id} title={post[0].title} email={post.email} />
    ))
  ) : (
    <div>
      <Loading />
    </div>
  );
}
