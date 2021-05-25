/**
 * Sample React Native App
 * https://github.com/facebook/react-native
 *
 * @format
 * @flow strict-local
 */

import React, {Component} from 'react';
import {
  Container,
  Header,
  Content,
  Left,
  Body,
  Icon,
  Text,
  ListItem,
  Input,
  Item,
  Thumbnail,
} from 'native-base';

let helperArray = require('./userList.json')
export default class ContentExample extends Component {
  constructor(props) {
    super(props);
    this.state = {
      allUsers: helperArray,
      usersFiltered: helperArray,
    };
  }

  searchUser(textToSearch) {
    this.setState({
      usersFiltered: this.state.allUsers.filter(i =>
        i.name.toLowerCase().includes(textToSearch.toLowerCase()),
      ),
    });
  }

  render() {
    return (
      <Container>
        <Header searchBar rounded>
          <Item>
            <Icon name="search" />
            <Input placeholder="Search Users"
              onChangeText={Text => {
                this.searchUser(Text);
              }} />
          </Item>
        </Header>
        <Content>
          {this.state.usersFiltered.map((item, index) => (
            <ListItem avatar>
              <Left>
                <Thumbnail source={{uri: item.image}} />
              </Left>
              <Body>
                <Text>{item.name}</Text>
                <Text note>{item.city}</Text>
              </Body>
            </ListItem>
          ))}
        </Content>
      </Container>
    );
  }
}