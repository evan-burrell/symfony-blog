import React from 'react';
import axios from 'axios';
import Post from './Post';
import Loading from 'react-simple-loading';

export default class PostList extends React.Component {
  constructor(props) {
    super(props);
    this.state = { posts: null };
  }

  async getPosts() {
    const url = 'http://symfony-blog.ampdev.co/api/posts';
    const response = await axios.get(url);
    return response.data;
  }

  componentDidMount() {
    if (!this.state.posts) {
      (async () => {
        try {
          this.setState({
            posts: await this.getPosts()
          });
        } catch (e) {
          console.log(e);
        }
      })();
    }
  }

  render() {
    return this.state.posts ? (
      this.state.posts.map((post, i) => (
        <Post
          key={i}
          id={post[0].id}
          title={post[0].title}
          email={post.email}
        />
      ))
    ) : (
      <div>
        <Loading />
      </div>
    );
  }
}
