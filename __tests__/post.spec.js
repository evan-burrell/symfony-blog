import React from 'react';
import { mount } from 'enzyme';
import Post from '../assets/js/components/Post';

describe('<Post />', () => {
    const fakeProps = {
        slug: "fake-slug",
        title: "Generic Title",
        email: "example@example.com"
    }

    const wrapper = mount(
    <Post slug={fakeProps.slug} title={fakeProps.title} email={fakeProps.email} />
  );

  it('renders three <div> in <Post />', () => {
    expect(wrapper.find('div')).toHaveLength(3);
  });

  it('renders the email property that is passed in', () => {
    expect(wrapper.prop('email')).toBe(fakeProps.email);
  });

  it('renders the title property that is passed in', () => {
    expect(wrapper.prop('title')).toBe(fakeProps.title);
  });

  it('renders the slug property that is passed in', () => {
    expect(wrapper.prop('slug')).toBe(fakeProps.slug);
  });
});
